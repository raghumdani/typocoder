#include<bits/stdc++.h>
using namespace std ;

int n ; 
long long ans =1 ;
string s ;

int main()
{
	int t ;
	cin>>t;
  	
	while(t--)
	{
		ans =1 ;
         cin>>s;
		 
		 for(int i=0;s[i]!='\0';i++)
		 {
	        ans = ans*(s[i] - '0') ;	 	
		 }		
       cout<<ans<<"\n" ;
	}
	return 0;
}