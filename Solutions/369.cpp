#include<bits/stdc++.h>
using namespace std;



int main()
{
	int t;
	scanf("%d",&t);
	while(t--)
	{
		long long int ans=1,n;
		scanf("%lld",&n);
		while(n>0)
		{
			ans*=(n%10);
			n/=10;
		}
		
		printf("%lld\n",ans);
	}
	return 0;
}