#include"bits/stdc++.h"
using namespace std;
#define MOD 1000000007
typedef long long ll;

ll A[1000005];

int main()
{
	int N,i,j,k,Q;
	scanf("%d",&N);	
	
	for(i=1;i<=N;i++)
	{
		scanf("%d",&A[i]);
	}
	scanf("%d",&Q);
	ll L,R;
	while(Q--)
	{
		scanf("%d %d",&L,&R);
		set<ll> S;
		for(i=L;i<=R;i++)
		S.insert(A[i]);
		
		ll ans=1;
		for(set<ll> :: iterator it=S.begin();it!=S.end();++it)
		{
			ans=(ans*(*it))%MOD;
		}
		printf("%lld\n",ans);
	}
	return 0;
}