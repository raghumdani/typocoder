#include"bits/stdc++.h"
using namespace std;



int main()
{
	long long T,N,i,j,k;
	scanf("%lld",&T);
	while(T--)
	{
		scanf("%lld",&N);
		int ans=1;
		while(N!=0)
		{
			ans=ans*(N%10);
			N/=10;
		}
		printf("%d\n",ans);
	}
	return 0;
}