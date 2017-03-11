#include<bits/stdc++.h>
using namespace std ;

int n  , mango[100009] , time1[100009]; 
vector  < pair < int  ,int  >  > v ;
map < long long  , int > m1 ;
set < long long  > s ;

int main()
{
	cin>>n;
	
	for(int i=0;i<n;i++)
	cin>>mango[i] ;
	
	for(int i=0;i<n;i++)
	{
	  cin>>time1[i] ;
	  v.push_back({time1[i] , mango[i]})	; 
	}
	
	sort(v.begin() , v.end()) ;
	
	int q ; 
	cin>>q ;
	 m1[0] =0 ; 
	 while(q--)
	 {
	   long long  int m ; 
	   cin>>m;
	   long long sum1 =0 ; 
	   int flag= 0 ;
	   for(int i=0;i<n;i++)
	   {
	       sum1 = sum1 + v[i].second ; 
		   if(sum1 >= m)
		   {
		      cout<<v[i].first<<"\n";
			  flag = 1 ;
			  break ;	
	       }  
		   s.insert(sum1) ;
		   m1[sum1]	 = v[i].first ;
       } 	
       if(flag == 1)
       continue ; 
       long long temp = m/sum1 ; 
       long long rem = m%sum1 ; 
        
       set< long long > ::iterator it; 
	   if(rem!=0)
	   it = s.lower_bound(rem) ;
       long long ans ;
       if(rem!=0)
	   ans= temp*m1[sum1] + m1[*it] ; 
       else
       ans = temp*m1[sum1] ;
       cout<<ans<<"\n" ;
	 }	
}