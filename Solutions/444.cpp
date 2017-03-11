#include<bits/stdc++.h>
using namespace std;

vector<int>adj[100005];

int visited[100005];

void dfs(int node)
{
	visited[node]=1;
	int i;
	
	for (i=0;i<adj[node].size();i++)
	{
		if(!visited[adj[node][i]])
		dfs(adj[node][i]);
	}
	
}

int main()
{
	int N,M;
	scanf("%d%d",&N,&M);
	
	int i;
	
	for (i=1;i<=M;i++)
	{
		int u,v;
		scanf("%d%d",&u,&v);
		adj[u].push_back(v);
		adj[v].push_back(u);
	}
	
	int ans=0;
	for (i=1;i<=N;i++)
	{
		if(!visited[i])
		{
			ans++;
			dfs(i);
		}
	}
	
	cout<<ans;
}