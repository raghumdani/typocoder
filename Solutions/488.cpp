#include<bits/stdc++.h>
using namespace std ;

int  n ,a[100009] ;
set < int >  s ;

int main()
{
    cin>>n;
	for(int i=0;i<n;i++)
	{
		int l ; 
		cin>>l;
		a[l] = i+1 ;
	}
    
    int ans= 0 ;
    
	for(int i=n;i>=1;i--)
	{
       if( i== n)
	   {
	   	ans+=n ;
	   	s.insert(a[i]) ; 
	   }
	   else
	   {
        	   	set<int >::iterator it = s.lower_bound(a[i]) , it1 = s.upper_bound(a[i]) ;
				   if(it1!=s.end() )
				   {
				   	int temp1 = *it1 - a[i] ;
				   	ans += temp1 ;
				   }
				   else
				   {
				   	it1-- ;
				   	int temp1 = a[i] - *it1 ;
					   temp1 = n - temp1 ; 
					   ans +=temp1 ; 
				   }
				   s.insert(a[i]) ;
	   }		
	}		
	cout<<ans<<"\n" ;
	return 0;
}