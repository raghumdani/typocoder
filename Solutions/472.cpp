#include <bits/stdc++.h>
using namespace std;




int main() {
	// your code goes here
	int n;
	cin>>n;
	vector<long int> a(n);
	vector<long int> b(n);
	
	for(int i=0;i<n;i++)
	{
	    cin>>a[i];
	    
	}
    for(int i=0;i<n;i++)
	{
	    cin>>b[i];
	    
	}
	int t;
	cin>>t;
	
	for(int c=0;c<t;c++)
	{   long int m;
	    cin>>m;
	    
	    long int sum=0; 
	    long int j;
	   for(j=1;;j++)
	   {  
	       for(int i=0;i<n;i++)
	       {
	           if(j%b[i]==0)
	           {
	               sum=sum+a[i];
	              
	           }
	       }
	       if(sum>=m)
	       {
	           break;
	       }
	   }
	
	   cout<<j<<endl;
	
	}
	return 0;
}