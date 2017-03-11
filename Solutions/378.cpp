#include <bits/stdc++.h>
using namespace std;

int main() {
	// your code goes here
	
	int t;
	cin>>t;
	for(int k=0;k<t;k++)
	{
	    int n;
	    cin>>n;
	    long int mul=1;
	    while(n!=0)
	    {
	        mul=mul*(n%10);
	        n=n/10;
	    }
	    cout<<mul<<endl;
	}
	
	
	
	
	
	return 0;
}