#include<bits/stdc++.h>
using namespace std ;

string  s ;
map < long long  , int > m , present;
vector < int > v  ;

int main()
{
	int t ;
	cin>>t;
	
	while(t--)
	{
	  m.clear() ;
      v.clear() ;
	  present.clear();
	  	  	
      cin>>s;
      int temp = 0 , n =0 ;
      
	  for(int i=0;s[i]!='\0';i++)
	  {
	  	v.push_back(s[i] - '0') ;
	    temp = (i+1)*(s[i] - '0') ;
		n = n*10  + (s[i] - '0') ;	
	  }
	  present[n] =1 ;
	  m[temp]++ ;
	  
	  while(next_permutation(v.begin() , v.end()))
	  {
	     long long sum1= 0 , num =0 ;
		 
		 for(int i=0;i<v.size() ;i++ )
		 {
		    sum1 = sum1 + (i+1)*v[i] ;
			num = num*10 + v[i] ;	
		 }	
		 if(present[num]!=1)
		 {
		 	present[num] =1 ;
		 	m[sum1]++ ;
		 }
	  }	
          int c = 0;
		  	  
	  for(map<long long  , int > ::iterator it = m.begin() ; it!=m.end();it++)
	  {
  	  	 c= max(it->second,c);
 	  }	
 	  cout<<c<<"\n" ;
    }
}