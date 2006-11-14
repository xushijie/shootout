/* The Computer Language Shootout
   http://shootout.alioth.debian.org/
   contributed by Isaac Gouy
*/

// This is an un-optimised example implementation
// Most for-comprehension replaced by while loops
// Piece orientations are cached rather than repeatedly computed


import scala.collection.mutable._

object meteor {
   def main(args: Array[String]) = {
      val n = if (args.length > 0) Integer.parseInt(args(0)) else 0

      val solver = new Solver
      solver.enoughSolutions = n
      solver.findSolutions
      solver.printSolutions
   }
}




// Solver.scala 
// import scala.collection.mutable._

final class Solver () {
   var enoughSolutions = 0

   private var solutions = new ListBuffer[String]
   private val board = new Board()

   val pieces = Array( 
      new Piece(0), new Piece(1), new Piece(2), new Piece(3), new Piece(4), 
      new Piece(5), new Piece(6), new Piece(7), new Piece(8), new Piece(9) )

   val unplaced = new BitSet(pieces.length)
   { unplaced ++= Iterator.range(0,unplaced.capacity) }


   def findSolutions(): Unit = {
      if (weHaveEnoughSolutions) return

      if (unplaced.size > 0){
         val emptyCellIndex = board.firstEmptyCellIndex

         var k = 0
         while (k < pieces.length){
            if (unplaced.contains(k)){
               unplaced -= k

               var i = 0
               while (i < Piece.orientations){
                  val piece = pieces(k).nextOrientation

                  var j = 0
                  while (j < Piece.size){
                     if (board.add(j,emptyCellIndex,piece)) {

                        if (!shouldPrune) findSolutions

                        board.remove(piece)
                     }
                     j = j + 1
                  }
                  i = i + 1
               }
               unplaced += k
            }
            k = k + 1
         }
      }
      else {
         puzzleSolved
      }
   }


   private def weHaveEnoughSolutions() = 
      enoughSolutions > 0 && solutions.length >= enoughSolutions 

   private def puzzleSolved() = solutions += board.asString

   private def shouldPrune(): Boolean = {
      board.unmark
      var i = 0
      while (i < board.cells.length){    
         if (board.cells(i).contiguousEmptyCells % Piece.size != 0) return true 
         i = i + 1
      }
      false
   }

   def printSolutions() = {

      def printBoard(s: String) = {
         var indent = false
         var i = 0
         while (i < s.length){
            if (indent) Console.print(' ')
            var j = 0
            while (j < Board.cols){
               Console.print(s.charAt(i)); Console.print(' ')
               j = j + 1
               i = i + 1
            }
            Console.print('\n')
            indent = !indent
         }
         Console.print('\n')
      }

      Console.print(solutions.length + " solutions found\n\n")
      solutions.toList .sort((a,b) => a < b) .foreach(s => printBoard(s))
   }

}




// Board.scala
// import scala.collection.mutable._

object Board {
   val cols = 5
   val rows = 10
   val size = rows * cols
}

final class Board { 
   val cells = boardCells()

   val cellsPieceWillFill = new Array[BoardCell](Piece.size)
   var cellCount = 0

   def unmark() = {
      var i = 0
      while (i < cells.length){    
         cells(i).unmark
         i = i + 1
      }
   }

   def asString() = 
      new String( cells map( 
         c => if (c.piece == null) '-'.toByte 
              else (c.piece.number + 48).toByte ))

   def firstEmptyCellIndex() = { 
      val _cells: Iterable[BoardCell] = cells
      _cells.indexOf(c => c.isEmpty)
   }

   def add(pieceIndex: Int, boardIndex: Int, p: Piece): Boolean = {
      cellCount = 0
      p.unmark
    
      find(p.cells()(pieceIndex), cells(boardIndex))

      if (cellCount != Piece.size) return false

      var i = 0
      while (i < cellCount){
         if (!cellsPieceWillFill(i).isEmpty) return false
         i = i + 1
      }

      i = 0
      while (i < cellCount){    
         cellsPieceWillFill(i).piece  = p
         i = i + 1
      }

      true
   }

   def remove(piece: Piece) = {
      var i = 0
      while (i < cells.length){  
         if (cells(i).piece == piece) cells(i).empty 
         i = i + 1
      }
   }

   private def find(p: PieceCell, b: BoardCell): Unit = {
      if (p != null && !p.marked && b != null){
         cellsPieceWillFill(cellCount) = b
         cellCount = cellCount + 1
         p.mark

         var i = 0
         while (i < Cell.sides){    
            find(p.next(i), b.next(i))
            i = i + 1
         }
      }
   }


   private def boardCells() = {
      type Row = List[BoardCell]
      type Edges = List[Pair[BoardCell,BoardCell]]

      val cols = Board.cols

      def rowAsEdges(row: Row, indent: Boolean) = {
         val e = row.take(cols-1) zip( row.drop(1) )
         if (indent) 
            Pair(null, e.head._1) :: e 
         else 
            e ::: List( Pair(e.last._2, null) )      
      }

      def joinEdgesNS(prev: Edges, row: Edges, indent: Boolean) =
         (prev zip row).foreach(
            pair => pair match {
               case Pair(Pair(a1,a2),Pair(b1,b2)) => 
                  if (indent){
                     b2.next(Cell.NW) = a1
                     b2.next(Cell.NE) = a2
                     a1.next(Cell.SE) = b2
                     if (a2 != null) a2.next(Cell.SW) = b2
                  } else {
                     b1.next(Cell.NW) = a1
                     b1.next(Cell.NE) = a2
                     a2.next(Cell.SW) = b1
                     if (a1 != null) a1.next(Cell.SE) = b1
                  }               
            } ) 

      def joinEdgesWE(row: Edges) = 
         row.foreach( 
            pair => pair match {
               case Pair(a,b) => {
                  if (a != null) a.next(Cell.E) = b
                  if (b != null) b.next(Cell.W) = a 
               }
            } ) 

      def makeBoardFromCellRows(prev: Edges, rows: List[Row], indent: Boolean): Unit = 
         rows match {
            case Nil => {}
            case r :: rs => {
               val current = rowAsEdges(r,indent)
               if (prev != Nil) joinEdgesNS(prev,current,indent) 
               joinEdgesWE(current)
               makeBoardFromCellRows(current,rs,!indent) 
            }
         }

      // a temporary list of lists of BoardCell representing the board
      val rows = 
         for (val i<- List.range(0,Board.rows)) 
            yield 
               for (val j <- List.range(0,cols)) yield new BoardCell(i*cols + j)

      makeBoardFromCellRows(Nil,rows,false)

      List.flatten(rows).toArray
   }


/*
// Printing all the board cells and their neighbours
// helps check that they are connected properly

   def printBoardCellsAndNeighbours() = {
      Console.println("cell\tNW NE W  E  SW SE")
      for (val i <- Iterator.range(0,Board.size)){
         Console.print(i + "\t")
         for (val j <- Iterator.range(0,Cell.sides)){
            val c = cells(i).next(j)
            if (c == null) 
               Console.print("-- ") 
            else 
               Console.printf("{0,number,00} ")(c.number)
         }
         Console.println("")
      }
      Console.println("")
   }
*/

}




// Piece.scala

object Piece {
   val size = 5
   val rotations = Cell.sides
   val flips = 2
   val orientations = rotations * flips
}

final class Piece(_number: Int) {
   val number = _number

   def unmark() = {
      var i = 0
      while (i < cells.length){    
         cells(i).unmark
         i = i + 1
      }
   }

   def cells() = cache(orientation)

   private val cache = 
      for (val i <- Array.range(0,Piece.orientations)) 
         yield pieceOrientation(i)

   private var orientation = 0

   def nextOrientation() = {    
      orientation = (orientation + 1) % Piece.orientations
      this
   }


   private def pieceOrientation(k: Int) = {
      val cells = for (val i <- Array.range(0,Piece.size)) yield new PieceCell()
      makePiece(number,cells)

      var i = 0
      while (i < k){  
         if (i % Piece.rotations == 0) 
            for (val c <- cells) c.flip
         else
            for (val c <- cells) c.rotate

         i = i + 1
      }
      cells
   }

   private def makePiece(number: Int, cells: Array[PieceCell]) = {
      number match {
         case 0 => make0(cells)
         case 1 => make1(cells)
         case 2 => make2(cells)
         case 3 => make3(cells)
         case 4 => make4(cells)
         case 5 => make5(cells)
         case 6 => make6(cells)
         case 7 => make7(cells)
         case 8 => make8(cells)
         case 9 => make9(cells)
      }
   }

   private def make0(a: Array[PieceCell]) = {
      a(0).next(Cell.E) = a(1)
      a(1).next(Cell.W) = a(0)
      a(1).next(Cell.E) = a(2)
      a(2).next(Cell.W) = a(1)
      a(2).next(Cell.E) = a(3)
      a(3).next(Cell.W) = a(2)
      a(3).next(Cell.SE) = a(4)
      a(4).next(Cell.NW) = a(3)
   }

   private def make1(a: Array[PieceCell]) = {
      a(0).next(Cell.SE) = a(1)
      a(1).next(Cell.NW) = a(0)
      a(1).next(Cell.SW) = a(2)
      a(2).next(Cell.NE) = a(1)
      a(2).next(Cell.W) = a(3)
      a(3).next(Cell.E) = a(2)
      a(3).next(Cell.SW) = a(4)
      a(4).next(Cell.NE) = a(3)
   }

   private def make2(a: Array[PieceCell]) = {
      a(0).next(Cell.W) = a(1)
      a(1).next(Cell.E) = a(0)
      a(1).next(Cell.SW) = a(2)
      a(2).next(Cell.NE) = a(1)
      a(2).next(Cell.SE) = a(3)
      a(3).next(Cell.NW) = a(2)
      a(3).next(Cell.SE) = a(4)
      a(4).next(Cell.NW) = a(3)
   }

   private def make3(a: Array[PieceCell]) = {
      a(0).next(Cell.SW) = a(1)
      a(1).next(Cell.NE) = a(0)
      a(1).next(Cell.W) = a(2)
      a(2).next(Cell.E) = a(1)
      a(1).next(Cell.SW) = a(3)
      a(3).next(Cell.NE) = a(1)
      a(2).next(Cell.SE) = a(3)
      a(3).next(Cell.NW) = a(2)
      a(3).next(Cell.SE) = a(4)
      a(4).next(Cell.NW) = a(3)
   }

   private def make4(a: Array[PieceCell]) = {
      a(0).next(Cell.SE) = a(1)
      a(1).next(Cell.NW) = a(0)
      a(1).next(Cell.SW) = a(2)
      a(2).next(Cell.NE) = a(1)
      a(1).next(Cell.E) = a(3)
      a(3).next(Cell.W) = a(1)
      a(3).next(Cell.SE) = a(4)
      a(4).next(Cell.NW) = a(3)
   }

   private def make5(a: Array[PieceCell]) = {
      a(0).next(Cell.SW) = a(1)
      a(1).next(Cell.NE) = a(0)
      a(0).next(Cell.SE) = a(2)
      a(2).next(Cell.NW) = a(0)
      a(1).next(Cell.SE) = a(3)
      a(3).next(Cell.NW) = a(1)
      a(2).next(Cell.SW) = a(3)
      a(3).next(Cell.NE) = a(2)
      a(3).next(Cell.SW) = a(4)
      a(4).next(Cell.NE) = a(3)
   }

   private def make6(a: Array[PieceCell]) = {
      a(0).next(Cell.SW) = a(1)
      a(1).next(Cell.NE) = a(0)
      a(2).next(Cell.SE) = a(1)
      a(1).next(Cell.NW) = a(2)
      a(1).next(Cell.SE) = a(3)
      a(3).next(Cell.NW) = a(1)
      a(3).next(Cell.SW) = a(4)
      a(4).next(Cell.NE) = a(3)
   }

   private def make7(a: Array[PieceCell]) = {
      a(0).next(Cell.SE) = a(1)
      a(1).next(Cell.NW) = a(0)
      a(0).next(Cell.SW) = a(2)
      a(2).next(Cell.NE) = a(0)
      a(2).next(Cell.SW) = a(3)
      a(3).next(Cell.NE) = a(2)
      a(3).next(Cell.SE) = a(4)
      a(4).next(Cell.NW) = a(3)
   }

   private def make8(a: Array[PieceCell]) = {
      a(0).next(Cell.E) = a(1)
      a(1).next(Cell.W) = a(0)
      a(1).next(Cell.E) = a(2)
      a(2).next(Cell.W) = a(1)
      a(2).next(Cell.NE) = a(3)
      a(3).next(Cell.SW) = a(2)
      a(3).next(Cell.E) = a(4)
      a(4).next(Cell.W) = a(3)
   }

   private def make9(a: Array[PieceCell]) = {
      a(0).next(Cell.E) = a(1)
      a(1).next(Cell.W) = a(0)
      a(1).next(Cell.E) = a(2)
      a(2).next(Cell.W) = a(1)
      a(2).next(Cell.NE) = a(3)
      a(3).next(Cell.SW) = a(2)
      a(2).next(Cell.E) = a(4)
      a(4).next(Cell.W) = a(2)
      a(4).next(Cell.NW) = a(3)
      a(3).next(Cell.SE) = a(4)
   }
}




// Cell.scala

object Cell {
   val NW = 0; val NE = 1
   val W  = 2; val E  = 3
   val SW = 4; val SE = 5   

   val sides = 6
}

abstract class Cell {
   type T
   val next = new Array[T](Cell.sides)
   var marked = false

   def mark() = marked = true
   def unmark() = marked = false
}




// BoardCell.scala

final class BoardCell(_number: Int) extends Cell {
   type T = BoardCell
   val number = _number
   var piece: Piece = _

   def isEmpty() = piece == null
   def empty() = piece = null

   def contiguousEmptyCells(): Int = {
      if (!marked && isEmpty){
         mark
         var count = 1 

         var i = 0
         while (i < next.length){      
            if (next(i) != null && next(i).isEmpty) 
               count = count + next(i).contiguousEmptyCells
            i = i + 1
         }

         count } else { 0 }
   }
}




// PieceCell.scala

final class PieceCell extends Cell {
   type T = PieceCell

   def flip = {
      var swap = next(Cell.NE)
      next(Cell.NE) = next(Cell.NW)
      next(Cell.NW) = swap

      swap = next(Cell.E)
      next(Cell.E) = next(Cell.W)
      next(Cell.W) = swap

      swap = next(Cell.SE)
      next(Cell.SE) = next(Cell.SW)
      next(Cell.SW) = swap
   }

   def rotate = {
      var swap = next(Cell.E)
      next(Cell.E) = next(Cell.NE)
      next(Cell.NE) = next(Cell.NW)
      next(Cell.NW) = next(Cell.W)
      next(Cell.W) = next(Cell.SW)
      next(Cell.SW) = next(Cell.SE)
      next(Cell.SE) = swap
   }
}




