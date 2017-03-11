#include<bits/stdc++.h>
using namespace std ; 

int n  , m  , Arr[1000009] , size[1000009] , present[1000009];

int root (int i)
{
    while(Arr[ i ] != i)
    {
        Arr[ i ] = Arr[ Arr[ i ] ] ; 
i = Arr[ i ]; 
    }
return i;
}

void union1(int A,int B)
{
    int root_A = root(A);
    int root_B = root(B);
    if(size[root_A] < size[root_B ])
    {
Arr[ root_A ] = Arr[root_B];
size[root_B] += size[root_A];
}
    else
    {
Arr[ root_B ] = Arr[root_A];
size[root_A] += size[root_B];
}

}



int main()
{
	
   cin>>n>>m;
   
   for(int i = 0;i<=n;i++)
    {
    Arr[ i ] = i ;
    size[ i ] = 1;
   }
   
   for(int i=0;i<m;i++)
   {
    int l ,r ; 
	cin>>l>>r ;
	 union1( l,r) ;  	
   }
   
   int c = 0 ;
   for(int i=1;i<=n;i++)
   {
   	  int ele = root( i) ;
   	  if(present[ele] != 1)
   	  {
   	    present[ele] =1 ;
		   c++ ; 	
	  }
   }	
   
   cout<<c<<"\n";
	return 0;
}