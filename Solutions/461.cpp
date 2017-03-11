#include<bits/stdc++.h>
using namespace std;

int mango[100005],t[100005];
int N;

bool ok(long long time,long long sum)
{
	int i;
	long long cnt=0;
	for (i=1;i<=N;i++)
	{
		cnt+=((time)/(t[i])*(long long)mango[i]);
	}
	
	if(cnt>=sum)
	return true;
	
	return false;
	
}

int main()
{
	
	scanf("%d",&N);
	
	int i;
	
	for (i=1;i<=N;i++)
	{
		scanf("%d",&mango[i]);
	}
	
	for (i=1;i<=N;i++)
	{
		scanf("%d",&t[i]);
	}
	
	int Q;
	scanf("%d",&Q);
	
	while(Q--)
	{
		long long x;
		scanf("%d",&x);
		
		long long l=0,r=1e18,best=1e18;
		
		while(l<=r)
		{
			long long mid=(l+r)/2;
			if(ok(mid,x))
			{
				best=min(best,mid);
				r=mid-1;
			}
			
			else 
			l=mid+1;
		}
		
		printf("%lld\n",best);
		
	}
	
}