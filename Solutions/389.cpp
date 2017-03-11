#include<bits/stdc++.h>
using namespace std ;

int n , a[100009] ;

int main()
{
    cin>>n;
	
	int total =0 , t1 =0 ;
	
	for(int i=0;i<n;i++)
	{
	  cin>>a[i] ;
	  total = total + a[i] ;
	  t1 += total; 	
	}
	
	sort(a,a+n) ;
	
	int ans=0  ,sum1 =0 ; 
	
	for(int i=0;i<n;i++)
	{
	   sum1 = sum1 + a[i] ;
	   ans += sum1 ; 
	   	
	}
	//cout<<total <<" "<<ans<<endl ;
	int diff = t1 - ans ; 
	cout<<diff<<"\n" ;	
	return  0 ;
	
}