#include<bits/stdc++.h>
using namespace std;

vector <int> v[100005];
int visit[100005];

void dfs(int s)
{
	visit[s]=1;
	int i,l=v[s].size();
	for(i=0;i<l;i++)
	{
		if(visit[v[s][i]]==0)
		{
			dfs(v[s][i]);
		}
	}
}

int main()
{
	memset(visit,0,sizeof(visit));
	int n,m,i,x,y,ans=0;
	scanf("%d%d",&n,&m);
	for(i=0;i<m;i++)
	{
		scanf("%d%d",&x,&y);
		v[x].push_back(y);
		v[y].push_back(x);
	}
	
	for(i=1;i<=n;i++)
	{
		if(visit[i]==0)
		{
			ans++;
			dfs(i);
		}
	}
	printf("%d\n",ans);
	return 0;
}