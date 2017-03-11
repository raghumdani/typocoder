#include <bits/stdc++.h>
using namespace std;
int main()
{
	int t;
	cin>>t;
	while (t--)
	{
		long n, x;
		long long ans=1;
		cin>>n;
		while (n!=0)
		{
			x = n%10;
			ans*=x;
			n/=10;
		}
		cout<<ans<<endl;
	}
return 0;	
}
