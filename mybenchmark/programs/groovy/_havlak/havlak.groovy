// Copyright 2011 Google Inc.
//
// Licensed under the Apache License, Version 2.0 (the "License")
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

//======================================================
// Test Code
//======================================================

import java.util.ArrayList;
import java.util.List;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.HashSet;
import java.util.Set;

/**
 * Test Program for the Havlak loop finder.
 *
 * This program constructs a fairly large control flow
 * graph and performs loop recognition. This is the Java
 * version.
 *
 * @author rhundt
 */

/*
 * Java code ported to Groovy by Oliver Plohmann
 */

// Copyright 2011 Google Inc.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

/*
 * Java code ported to Groovy by Oliver Plohmann
 */

 /**
 * class BasicBlock
 *
 * BasicBlock only maintains a vector of in-edges and
 * a vector of out-edges.
 */

 public class BasicBlock {

    def static numBasicBlocks = 0

    def static getNumBasicBlocks() {
        return numBasicBlocks
    }

    def BasicBlock(def name) {
        this.name = name
        inEdges   = new ArrayList<BasicBlock>()
        outEdges  = new ArrayList<BasicBlock>()
        ++numBasicBlocks
    }

    def dump() {
        System.out.format("BB#%03d: ", getName())
        if (inEdges.size() > 0) {
            System.out.format("in : ")
            for (def bb : inEdges) {
                System.out.format("BB#%03d ", bb.getName())
            }
        }
        if (outEdges.size() > 0) {
            System.out.format("out: ")
            for (def bb : outEdges) {
                System.out.format("BB#%03d ", bb.getName())
            }
        }
        System.out.println()
    }

    def getName() {
        return name
    }

    def getInEdges() {
        return inEdges
    }

    def getOutEdges() {
        return outEdges
    }

    def getNumPred() {
        return inEdges.size()
    }

    def getNumSucc() {
        return outEdges.size()
    }

    def addOutEdge(def to) {
        outEdges.add(to)
    }

    def addInEdge(def from) {
        inEdges.add(from)
    }

    def private inEdges, outEdges
    def private name
}


// Copyright 2011 Google Inc.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

/**
 * A simple class simulating the concept of Edges
 * between Basic Blocks
 *
 * @author rhundt
 */
/*
 * Java code ported to Groovy by Oliver Plohmann
 */

/**
 * class BasicBlockEdga
 *
 * These data structures are stubbed out to make the code below easier
 * to review.
 *
 * BasicBlockEdge only maintains two pointers to BasicBlocks.
 */
public class BasicBlockEdge
{
    def from, to

    public BasicBlockEdge(def cfg, def fromName, def toName)
    {
        from = cfg.createNode(fromName)
        to   = cfg.createNode(toName)

        from.addOutEdge(to)
        to.addInEdge(from)

        cfg.addEdge(this)
    }

    def getSrc() { return from }
    def getDst() { return to }

}

// Copyright 2011 Google Inc.
//
// Licensed under the Apache License, Version 2.0 (the "License")
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

/**
 * A simple class simulating the concept of
 * a control flow graph.
 *
 * @author rhundt
 */
/*
 * Java code ported to Groovy by Oliver Plohmann
 */


/**
 * class CFG
 *
 * CFG maintains a list of nodes, plus a start node.
 * That's it.
 */
public class CFG
{
    def basicBlockMap
    def startNode
    def edgeList

    def CFG() {
        startNode = null
        basicBlockMap = new HashMap<Integer, BasicBlock>()
        edgeList = new ArrayList<BasicBlockEdge>()
    }

    def createNode(def name) {
        BasicBlock node
        if (!basicBlockMap.containsKey(name)) {
            node = new BasicBlock(name)
            basicBlockMap.put(name, node)
        } else {
            node = basicBlockMap.get(name)
        }

        if (getNumNodes() == 1) {
            startNode = node
        }

        return node
    }

    def dump() {
        for (def bb : basicBlockMap.values()) {
            bb.dump()
        }
    }

    def addEdge(def edge) {
        edgeList.add(edge)
    }

    def getNumNodes() {
        return basicBlockMap.size()
    }

    def getStartBasicBlock() {
        return startNode
    }

    def getDst(BasicBlockEdge edge) {
        return edge.getDst()
    }

    def getSrc(def edge) {
        return edge.getSrc()
    }

    def getBasicBlocks() {
        return basicBlockMap
    }

}

// Copyright 2011 Google Inc.
//
// Licensed under the Apache License, Version 2.0 (the "License")
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

//======================================================
// Main Algorithm
//======================================================

/**
 * The Havlak loop finding algorithm.
 *
 * @author rhundt
 */
/*
 * Java code ported to Groovy by Oliver Plohmann
 */

/**
 * class HavlakLoopFinder
 *
 * This class encapsulates the complete finder algorithm
 */
public class HavlakLoopFinder {

    def CFG cfg      // Control Flow Graph
    def LSG lsg      // Loop Structure Graph

    def static long maxMillis = 0
    def static long minMillis = Integer.MAX_VALUE

    def HavlakLoopFinder(def cfg, def lsg) {
        this.cfg = cfg
        this.lsg = lsg
    }

    /**
     * enum BasicBlockClass
     *
     * Basic Blocks and Loops are being classified as regular, irreducible,
     * and so on. This enum contains a symbolic name for all these classifications
     */
    def enum BasicBlockClass {
        BB_TOP,          // uninitialized
        BB_NONHEADER,    // a regular BB
        BB_REDUCIBLE,    // reducible loop
        BB_SELF,         // single BB loop
        BB_IRREDUCIBLE,  // irreducible loop
        BB_DEAD,         // a dead BB
        BB_LAST          // Sentinel
    }


    /**
     * class UnionFindNode
     *
     * The algorithm uses the Union/Find algorithm to collapse
     * complete loops into a single node. These nodes and the
     * corresponding functionality are implemented with this class
     */
    public class UnionFindNode {

        def UnionFindNode() {
        }

        // Initialize this node.
        //
        def initNode(def bb, def dfsNumber) {
            this.parent     = this
            this.bb         = bb
            this.dfsNumber  = dfsNumber
            this.loop       = null
        }

        // Union/Find Algorithm - The find routine.
        //
        // Implemented with Path Compression (inner loops are only
        // visited and collapsed once, however, deep nests would still
        // result in significant traversals).
        //
        def UnionFindNode findSet() {

            def nodeList = new ArrayList<UnionFindNode>()

            def node = this
            while (node != node.getParent()) {
                if (node.getParent() != node.getParent().getParent()) {
                    nodeList.add(node)
                }
                node = node.getParent()
            }

            // Path Compression, all nodes' parents point to the 1st level parent.
            for (iter in nodeList)
                iter.setParent(node.getParent())
            return node
        }

        // Union/Find Algorithm - The union routine.
        //
        // Trivial. Assigning parent pointer is enough,
        // we rely on path compression.
        //
        def union(def basicBlock) {
            setParent(basicBlock)
        }

        def parent
        def bb
        def loop
        def dfsNumber
    }

    //
    // Constants
    //
    // Marker for uninitialized nodes.
    def static final UNVISITED = Integer.MAX_VALUE

    // Safeguard against pathologic algorithm behavior.
    def static final MAXNONBACKPREDS = (32 * 1024)

    //
    // IsAncestor
    //
    // As described in the paper, determine whether a node 'w' is a
    // "true" ancestor for node 'v'.
    //
    // Dominance can be tested quickly using a pre-order trick
    // for depth-first spanning trees. This is why DFS is the first
    // thing we run below.
    //
    def isAncestor(def w, def v, def last) {
        return (w <= v) && (v <= last[w])
    }

    //
    // DFS - Depth-First-Search
    //
    // DESCRIPTION:
    // Simple depth first traversal along out edges with node numbering.
    //
    def doDFS(def currentNode,
              def nodes,
              def number,
              def last,
              def final current) {
        nodes[current].initNode(currentNode, current)
        number.put(currentNode, current)

        def lastid = current
        for (target in currentNode.getOutEdges()) {
            if (number.get(target) == UNVISITED) {
                lastid = doDFS(target, nodes, number, last, lastid + 1)
            }
        }
        last[number.get(currentNode)] = lastid
        return lastid
    }

    static def nonBackPreds = new ArrayList<Set<Integer>>()
    static def backPreds = new ArrayList<List<Integer>>()
    static def number = new HashMap<BasicBlock, Integer>()
    static def maxSize = 0
    static def header
    static def type
    static def last
    static def nodes
    //
    // findLoops
    //
    // Find loops and build loop forest using Havlak's algorithm, which
    // is derived from Tarjan. Variable names and step numbering has
    // been chosen to be identical to the nomenclature in Havlak's
    // paper (which, in turn, is similar to the one used by Tarjan).
    //
    def findLoops() {
        if (cfg.getStartBasicBlock() == null) {
            return
        }

        def startMillis = System.currentTimeMillis()

        def size = cfg.getNumNodes()

        nonBackPreds.clear()
        backPreds.clear()
        number.clear()
        if (size > maxSize) {
            header = new int[size]
            type = new BasicBlockClass[size]
            last = new int[size]
            nodes = new UnionFindNode[size]
            maxSize = size
        }

        for (def i = 0; i < size; ++i) {
            nonBackPreds.add(new HashSet<Integer>())
            backPreds.add(new ArrayList<Integer>())
            nodes[i] = new UnionFindNode()
        }

        // Step a:
        //   - initialize all nodes as unvisited.
        //   - depth-first traversal and numbering.
        //   - unreached BB's are marked as dead.
        //
        for (bbIter in cfg.getBasicBlocks().values()) {
            number.put(bbIter, UNVISITED)
        }

        doDFS(cfg.getStartBasicBlock(), nodes, number, last, 0)

        // Step b:
        //   - iterate over all nodes.
        //
        //   A backedge comes from a descendant in the DFS tree, and non-backedges
        //   from non-descendants (following Tarjan).
        //
        //   - check incoming edges 'v' and add them to either
        //     - the list of backedges (backPreds) or
        //     - the list of non-backedges (nonBackPreds)
        //
        for (def w = 0; w < size; w++) {
            header[w] = 0
            type[w] = BasicBlockClass.BB_NONHEADER

            def nodeW = nodes[w].getBb()
            if (nodeW == null) {
                type[w] = BasicBlockClass.BB_DEAD
                continue  // dead BB
            }

            if (nodeW.getNumPred() > 0) {
                for (nodeV in nodeW.getInEdges()) {
                    def v = number.get(nodeV)
                    if (v == UNVISITED) {
                        continue  // dead node
                    }

                    if (isAncestor(w, v, last)) {
                        backPreds.get(w).add(v)
                    } else {
                        nonBackPreds.get(w).add(v)
                    }
                }
            }
        }

        // Start node is root of all other loops.
        header[0] = 0

        // Step c:
        //
        // The outer loop, unchanged from Tarjan. It does nothing except
        // for those nodes which are the destinations of backedges.
        // For a header node w, we chase backward from the sources of the
        // backedges adding nodes to the set P, representing the body of
        // the loop headed by w.
        //
        // By running through the nodes in reverse of the DFST preorder,
        // we ensure that inner loop headers will be processed before the
        // headers for surrounding loops.
        //
        for (def w = size - 1; w >= 0; w--) {
            // this is 'P' in Havlak's paper
            def nodePool = new LinkedList<UnionFindNode>()

            def nodeW = nodes[w].getBb()
            if (nodeW == null) {
                continue  // dead BB
            }

            // Step d:
            for (def v : backPreds.get(w)) {
                if (v != w) {
                    nodePool.add(nodes[v].findSet())
                } else {
                    type[w] = BasicBlockClass.BB_SELF
                }
            }

            // Copy nodePool to workList.
            //
            def workList = new LinkedList<UnionFindNode>()
            for (niter in nodePool)
                workList.add(niter)

            if (nodePool.size() != 0) {
                type[w] = BasicBlockClass.BB_REDUCIBLE
            }

            // work the list...
            //
            while (!workList.isEmpty()) {
                def x = workList.getFirst()
                workList.removeFirst()

                // Step e:
                //
                // Step e represents the main difference from Tarjan's method.
                // Chasing upwards from the sources of a node w's backedges. If
                // there is a node y' that is not a descendant of w, w is marked
                // the header of an irreducible loop, there is another entry
                // into this loop that avoids w.
                //

                // The algorithm has degenerated. Break and
                // return in this case.
                //
                def nonBackSize = nonBackPreds.get(x.getDfsNumber()).size()
                if (nonBackSize > MAXNONBACKPREDS) {
                    return
                }

                for (iter in nonBackPreds.get(x.getDfsNumber())) {
                    def y = nodes[iter]
                    def ydash = y.findSet()

                    if (!isAncestor(w, ydash.getDfsNumber(), last)) {
                        type[w] = BasicBlockClass.BB_IRREDUCIBLE
                        nonBackPreds.get(w).add(ydash.getDfsNumber())
                    } else {
                        if (ydash.getDfsNumber() != w) {
                            if (!nodePool.contains(ydash)) {
                                workList.add(ydash)
                                nodePool.add(ydash)
                            }
                        }
                    }
                }
            }

            // Collapse/Unionize nodes in a SCC to a single node
            // For every SCC found, create a loop descriptor and link it in.
            //
            if ((nodePool.size() > 0) || (type[w] == BasicBlockClass.BB_SELF)) {
                def loop = lsg.createNewLoop()

                loop.setHeader(nodeW)
                loop.setIsReducible(type[w] != BasicBlockClass.BB_IRREDUCIBLE)

                // At this point, one can set attributes to the loop, such as:
                //
                // the bottom node:
                //    iter  = backPreds[w].begin()
                //    loop bottom is: nodes[iter].node)
                //
                // the number of backedges:
                //    backPreds[w].size()
                //
                // whether this loop is reducible:
                //    type[w] != BasicBlockClass.BB_IRREDUCIBLE
                //
                nodes[w].setLoop(loop)

                for (node in nodePool) {
                    // Add nodes to loop descriptor.
                    header[node.getDfsNumber()] = w
                    node.union(nodes[w])

                    // Nested loops are not added, but linked together.
                    if (node.getLoop() != null) {
                        node.getLoop().setParent(loop)
                    } else {
                        loop.addNode(node.getBb())
                    }
                }

                lsg.addLoop(loop)
            }  // nodePool.size
        }  // Step c

        def totalMillis = System.currentTimeMillis() - startMillis

        if (totalMillis > maxMillis) {
            maxMillis = totalMillis
        }
        if (totalMillis < minMillis) {
            minMillis = totalMillis
        }
    }  // findLoops

}

// Copyright 2011 Google Inc.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

//======================================================
// Scaffold Code
//======================================================

/**
 * Loop Structure Graph - Scaffold Code
 *
 * @author rhundt
 */

/*
 * Java code ported to Groovy by Oliver Plohmann
 */

/**
 * LoopStructureGraph
 *
 * Maintain loop structure for a given CFG.
 *
 * Two values are maintained for this loop graph, depth, and nesting level.
 * For example:
 *
 * loop        nesting level    depth
 *----------------------------------------
 * loop-0      2                0
 *   loop-1    1                1
 *   loop-3    1                1
 *     loop-2  0                2
 */
public class LSG {

    def root
    def loops
    def loopCounter

    def LSG() {
        loopCounter = 0
        loops = new ArrayList<SimpleLoop>()
        root = new SimpleLoop()
        root.setNestingLevel(0)
        root.setCounter(loopCounter++)
        addLoop(root)
    }

    def createNewLoop() {
        def loop = new SimpleLoop()
        loop.setCounter(loopCounter++)
        return loop
    }

    def addLoop(def loop) {
        loops.add(loop)
    }

    def dump() {
        dumpRec(root, 0)
    }

    def private dumpRec(def loop, def indent) {
        // Simplified for readability purposes.
        lodefop.dump(indent)

        for(liter in loop.getChildren())
            dumpRec(liter,  indent + 1)
    }

    def calculateNestingLevel() {
        // link up all 1st level loops to artificial root node.
        for(liter in loops) {
            if (liter.isRoot()) {
                continue
            }
            if (liter.getParent() == null) {
                liter.setParent(root)
            }
        }

        // recursively traverse the tree and assign levels.
        calculateNestingLevelRec(root, 0)
    }

    def calculateNestingLevelRec(def loop, def depth) {
        loop.setDepthLevel(depth)
        for(liter in loop.getChildren()) {
            calculateNestingLevelRec(liter, depth + 1)
            loop.setNestingLevel(Math.max(loop.getNestingLevel(), 1 + liter.getNestingLevel()))
        }
    }

    def getNumLoops() {
        return loops.size()
    }

}

// Copyright 2011 Google Inc.
//
// Licensed under the Apache License, Version 2.0 (the "License")
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

//======================================================
// Scaffold Code
//======================================================

/**
 * The Havlak loop finding algorithm.
 *
 * @author rhundt
 */

/*
 * Java code ported to Groovy by Oliver Plohmann
 */

/**
 * class SimpleLoop
 *
 * Basic representation of loops, a loop has an entry point,
 * one or more exit edges, a set of basic blocks, and potentially
 * an outer loop - a "parent" loop.
 *
 * Furthermore, it can have any set of properties, e.g.,
 * it can be an irreducible loop, have control flow, be
 * a candidate for transformations, and what not.
 */
public class SimpleLoop
{
    def basicBlocks
    def children
    def parent
    def header

    def isRoot
    def isReducible
    def counter
    def nestingLevel
    def depthLevel

    def SimpleLoop() {
        parent = null
        isRoot = false
        isReducible  = true
        nestingLevel = 0
        depthLevel   = 0
        basicBlocks  = new HashSet<BasicBlock>()
        children     = new HashSet<SimpleLoop>()
    }

    def addNode(def bb) {
        basicBlocks.add(bb)
    }

    def addChildLoop(def loop) {
        children.add(loop)
    }

    def dump(def indent) {
        for (def i = 0; i < indent; i++)
            System.out.format("  ")

        System.out.format("loop-%d nest: %d depth %d %s",
                counter, nestingLevel, depthLevel,
                isReducible ? "" : "(Irreducible) ")
        if (!getChildren().isEmpty()) {
            System.out.format("Children: ")
            for (SimpleLoop loop : getChildren()) {
                System.out.format("loop-%d ", loop.getCounter())
            }
        }
        if (!basicBlocks.isEmpty()) {
            System.out.format("(")
            for (bb in basicBlocks) {
                System.out.format("BB#%d%s", bb.getName(), header == bb ? "* " : " ")
            }
            System.out.format("\b)")
        }
        System.out.format("\n")
    }

    def setParent(def parent) {
        this.parent = parent
        this.parent.addChildLoop(this)
    }

    def setHeader(def bb) {
        basicBlocks.add(bb)
        header = bb
    }

    def isRoot() {
        return isRoot;
    }

    def setIsRoot() {
        isRoot = true
    }

    def setNestingLevel(def level) {
        nestingLevel = level
        if (level == 0) {
            setIsRoot()
        }
    }

    def setIsReducible(def isReducible) {
        this.isReducible = isReducible
    }

}

class LoopTesterApp
{
    def CFG cfg
    def LSG lsg
    def BasicBlock root

    public LoopTesterApp() {
        cfg = new CFG()
        lsg = new LSG()
        root = cfg.createNode(0)
    }

    // Create 4 basic blocks, corresponding to and if/then/else clause
    // with a CFG that looks like a diamond
    def buildDiamond(def start) {
        def bb0 = start
        new BasicBlockEdge(cfg, bb0, bb0 + 1)
        new BasicBlockEdge(cfg, bb0, bb0 + 2)
        new BasicBlockEdge(cfg, bb0 + 1, bb0 + 3)
        new BasicBlockEdge(cfg, bb0 + 2, bb0 + 3)

        return bb0 + 3
    }

    // Connect two existing nodes
    def buildConnect(def start, def end) {
        new BasicBlockEdge(cfg, start, end)
    }

    // Form a straight connected sequence of n basic blocks
    def buildStraight(def start, def n) {
        for (def i = 0; i < n; i++)
            buildConnect(start + i, start + i + 1)
        return start + n
    }

    // Construct a simple loop with two diamonds in it
    def buildBaseLoop(def from) {
        def header = buildStraight(from, 1)
        def diamond1 = buildDiamond(header)
        def d11 = buildStraight(diamond1, 1)
        def diamond2 = buildDiamond(d11)
        def footer = buildStraight(diamond2, 1)
        buildConnect(diamond2, d11)
        buildConnect(diamond1, header)

        buildConnect(footer, from)
        footer = buildStraight(footer, 1)
        return footer
    }

    def getMem() {
        def runtime = Runtime.getRuntime()
        def val = runtime.totalMemory() / 1024
        System.out.println("  Total Memory: " + val + " KB")
    }

}

def static void main(String[] args) {
        System.out.println("Welcome to LoopTesterApp, Groovy without @CompileStatic edition")

        System.out.println("Constructing App...")
        def app = new LoopTesterApp()
        app.getMem()

        System.out.println("Constructing Simple CFG...")
        app.cfg.createNode(0)
        app.buildBaseLoop(0)
        app.cfg.createNode(1)
        new BasicBlockEdge(app.cfg, 0, 2)

        System.out.println("15000 dummy loops")
        for (def dummyloop = 0; dummyloop < 15000; dummyloop++) {
            HavlakLoopFinder finder = new HavlakLoopFinder(app.cfg, app.lsg)
            finder.findLoops()
        }

        System.out.println("Constructing CFG...")
        def n = 2

        for (def parlooptrees = 0; parlooptrees < 10; parlooptrees++) {
            app.cfg.createNode(n + 1)
            app.buildConnect(2, n + 1)
            n = n + 1

            for (def i = 0; i < 100; i++) {
                def top = n
                n = app.buildStraight(n, 1)
                for (def j = 0; j < 25; j++) {
                    n = app.buildBaseLoop(n)
                }
                def bottom = app.buildStraight(n, 1)
                app.buildConnect(n, top)
                n = bottom
            }
            app.buildConnect(n, 1)
        }

        app.getMem()
        System.out.format("Performing Loop Recognition\n1 Iteration\n")
        def finder = new HavlakLoopFinder(app.cfg, app.lsg)
        finder.findLoops()
        app.getMem()

        System.out.println("Another 50 iterations...")

        def start = System.currentTimeMillis()
        def maxMemory = Runtime.getRuntime().maxMemory()

        for (def i = 0; i < 50; i++) {
            System.out.println(maxMemory - Runtime.getRuntime().freeMemory())
            def finder2 = new HavlakLoopFinder(app.cfg, new LSG())
            finder2.findLoops()
        }

        System.out.println("\nTime: " + (System.currentTimeMillis() - start) + " ms")

        System.out.println("")
        app.getMem()
        System.out.println("# of loops: " + app.lsg.getNumLoops() +
                " (including 1 artificial root node)")
        System.out.println("# of BBs  : " + BasicBlock.getNumBasicBlocks())
        System.out.println("# max time: " + finder.getMaxMillis())
        System.out.println("# min time: " + finder.getMinMillis())
        app.lsg.calculateNestingLevel()
        //app.lsg.Dump()
}
