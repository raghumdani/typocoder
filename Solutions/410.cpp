#include<bits/stdc++.h>
using namespace std;

int dp[2005][2],A[2005];

int main()
{
	int T;
	scanf("%d",&T);
	
	while(T--)
	{
		int N;
		scanf("%d",&N);
		
		int i;
		
		for (i=1;i<=N;i++)
		scanf("%d",&A[i]);
		
		dp[1][0]=dp[1][1]=1;
		
		for (i=2;i<=N;i++)
		{
			int maxi=0;
			for (int j=1;j<i;j++)
			{
				if(A[i]<A[j])
				{
					maxi=max(maxi,dp[j][1]);
				}
			}
			
			dp[i][0]=maxi+1;
			
			maxi=0;
			for (int j=1;j<i;j++)
			{
				if(A[i]>A[j])
				{
					maxi=max(maxi,dp[j][0]);
				}
			}
			
			dp[i][1]=maxi+1;
		}
		
		int maxi=0,ind,f;
		for (i=1;i<=N;i++)
		{
			if(dp[i][0]>maxi)
			{
				maxi=dp[i][0];
				ind=i;
				f=0;
			}
			
			if(dp[i][1]>maxi)
			{
				maxi=dp[i][1];
				ind=i;
				f=1;
			}
			
		}
		cout<<maxi<<endl;
		int len=0;
		vector<int>ans;
	
		
		while(len<maxi)
		{
				ans.push_back(A[ind]);
			if(f==0)
			{
				for (i=1;i<ind;i++)
				{
					if(A[i]>A[ind])
					{
						if(dp[i][1]==dp[ind][0]-1)
						{
							ind=i;
							f=1;
							break;
						}
					}
				}
			}
			
			else
			{
				for (i=1;i<ind;i++)
				{
					if(A[i]<A[ind])
					{
						if(dp[i][0]==dp[ind][1]-1)
						{
							ind=i;
							f=0;
							break;
						}
					}
				}
			}
			len++;
		}
		
		for (i=ans.size()-1;i>=0;i--)
		{
			printf("%d ",ans[i]);
		}
		printf("\n");
		
	}
}