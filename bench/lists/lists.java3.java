// $Id: lists.java3.java,v 1.1 2004-05-23 07:12:55 bfulgham Exp $
// http://www.bagley.org/~doug/shootout/
// from Stephen Darnell

//import java.io.*;		// XXX Not needed
//import java.util.*;	// XXX Replaced by private version
//import java.text.*;	// XXX Not needed

public class lists {

	// XXX Make SIZE a final static
    final static int SIZE = 10000;

    public static void main(String args[])
    {
		int n = 10;
		if (args.length == 1)
		{
			n = Integer.parseInt(args[0]);
		}

		long start = System.currentTimeMillis();

		int result = 0;
		for (int i = 0; i < n; i++) {
		    result = test_lists();
		}
		long stop = System.currentTimeMillis();

		System.out.println(result);
		// System.out.println("Took "+(stop-start)+" ms");
    }

    public static int test_lists() {
	int result = 0;
	// create a list of integers (Li1) from 1 to SIZE
	LinkedList Li1 = new LinkedList();
	for (int i = 1; i < SIZE+1; i++) {
	    Li1.addLast(new LLEntry(i));
	}

//	System.out.println("Li1 "+Li1.size());

	// copy the list to Li2 (not by individual items)
	LinkedList Li2 = new LinkedList(Li1);
	LinkedList Li3 = new LinkedList();

//	System.out.println("Li2 "+Li2.size()+" Li3 "+Li3.size());

	// remove each individual item from left side of Li2 and
	// append to right side of Li3 (preserving order)
	while (! Li2.isEmpty()) {
	    Li3.addLast(Li2.removeFirst());
	}

//	System.out.println("Li2 "+Li2.size()+" Li3 "+Li3.size());

	// Li2 must now be empty
	// remove each individual item from right side of Li3 and
	// append to right side of Li2 (reversing list)
	while (! Li3.isEmpty()) {
	    Li2.addLast(Li3.removeLast());
	}

//	System.out.println("Li2 "+Li2.size()+" Li3 "+Li3.size());

	// Li3 must now be empty
	// reverse Li1
	LinkedList tmp = new LinkedList();
	while (! Li1.isEmpty()) {
	    tmp.addFirst(Li1.removeFirst());
	}
	Li1 = tmp;
	// check that first item is now SIZE
	if (Li1.getFirst().val != SIZE) {
	    System.err.println("first item of Li1 != SIZE");
	    return(0);
	}
	// compare Li1 and Li2 for equality
	if (! Li1.equals(Li2)) {
	    System.err.println("Li1 and Li2 differ");
	    System.err.println("Li1:" + Li1);
	    System.err.println("Li2:" + Li2);
	    return(0);
	}
	// return the length of the list
	return(Li1.size());
    }
}

class LLEntry
{
	LLEntry prev, next;
	int val;

	LLEntry(int value) {
		val = value;
	}
}

class LinkedList
{
	LLEntry head;

	LinkedList()
	{
		head = new LLEntry(0);
		head.prev = head.next = head;
	}

	LinkedList( LinkedList other )
	{
		this();

		LLEntry last = head;
		LLEntry otherHead = other.head;
		for( LLEntry curr = otherHead.next ; curr != otherHead ; curr = curr.next )
		{
			LLEntry entry = new LLEntry(curr.val);
			last.next = entry;
			entry.prev = last;
			last = entry;
		}
		last.next = head;
		head.prev = last;

		head.val = otherHead.val;
	}

	boolean isEmpty()
	{
		return head.val == 0;
	}

	void addFirst( LLEntry entry )
	{
		entry.prev = head;
		entry.next = head.next;
		head.next.prev = entry;
		head.next = entry;
		head.val++;
	}

	void addLast( LLEntry entry )
	{
		entry.next = head;
		entry.prev = head.prev;
		head.prev.next = entry;
		head.prev = entry;
		head.val++;
	}

	LLEntry removeFirst()
	{
		LLEntry entry = head.next;
		if (entry == head)
			return null;

		head.val--;
		head.next = entry.next;
		entry.next.prev = head;
		return entry;
	}

	LLEntry removeLast()
	{
		LLEntry entry = head.prev;
		if (entry == head)
			return null;

		head.val--;
		head.prev = entry.prev;
		entry.prev.next = head;
		return entry;
	}

	LLEntry getFirst()
	{
		return head.next;
	}

	int size()
	{
// Simple sanity checking code:
//		int n = 0;
//		for( LLEntry curr = head.next; curr != head ; curr = curr.next)
//		{
//			n++;
//		}
//		if (n != head.val)
//			throw new Error("size mismatch");

		return head.val;
	}

	boolean equals(LinkedList other)
	{
		LLEntry myHead = head;
		LLEntry myItem = myHead;
		LLEntry theirItem = other.head;
		do
		{
			if (myItem.val != theirItem.val)
				return false;
			theirItem = theirItem.next;
			myItem = myItem.next;
		}
		while(myItem != myHead);
		return true;
	}
}
