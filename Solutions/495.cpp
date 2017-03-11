#include<bits/stdc++.h>
using namespace std;

int a[2002],dp[2002][2],pr[2002][2];

void solve(int n)
{
	int i,j,ans=0,ind=-1,x=-1;
	stack<int> s;
	
	for(i=0;i<n;i++)
	{
		dp[i][0]=dp[i][1]=1;
		
	}
	
	for(i=0;i<n;i++)
	{
		for(j=0;j<i;j++)
		{
			if(a[i]>a[j] && dp[i][1] < dp[j][0] + 1)
			{
				dp[i][1] = dp[j][0] + 1;
				pr[i][1] = j;
			}
			else if(a[i]<a[j] && dp[i][0] < dp[j][1] + 1)
			{
				dp[i][0] = dp[j][1] + 1;
				pr[i][0] = j;
			}
		}
	}

	for(i=0;i<n;i++)
	{
		if(dp[i][0] > ans)	
		{
			ans = dp[i][0];
			x = 0;
			ind = i;
		}
		
		if(dp[i][1] > ans)
		{
			ans = dp[i][1];
			x = 1;
			ind = i;
		}
	}
	
	printf("%d\n",ans);
	s.push(a[ind]);
	ans--;
	
	while(ans--)
	{
		x=1-x;
		ind=pr[ind][1-x];
		s.push(a[ind]);
	}
	
	while(!s.empty())
	{
		printf("%d ",s.top());
		s.pop();
	}
	printf("\n");
}

int main()
{
	int T;
	scanf("%d",&T);
	
	while(T--)
	{
		int n,i;
		
		scanf("%d",&n);
		
		for(i=0;i<n;i++)
		{
			scanf("%d",a+i);
		}
		solve(n);
	}
	
	return 0;
}