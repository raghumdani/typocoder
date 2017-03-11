///a(n) = (1+a(floor(n/2))) mod 3.

#include<bits/stdc++.h>
using namespace std ;

long long x ;
int solve(long long int i)
{
	if(i == 0 )
	return 0 ;
	else
	{
		return((1 + solve(floor(i/2)))%3) ;
	}
}
int main()
{
	int g ;
	cin>>g;
	
	while(g--)
	{
      cin>>x; 		
      int ans = solve(x) ;
      if(ans!= 0)
      cout<<"Alice\n";
      else
      cout<<"Bob\n";
	}
	return 0;
	
}