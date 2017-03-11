#include"bits/stdc++.h"
using namespace std;

vector <int> adj[5000005];
int visit[5000005],present[5000005];
void dfs(int i)
{
	visit[i]=1;
	
	for(int j=0;j<adj[i].size();j++)
	{
		if(!visit[adj[i][j]])
		{
			dfs(adj[i][j]);
		}
	}
}
int main()
{
	int N,M,i,j,k;
	
	scanf("%d %d",&N,&M);
	int x,y;
	for(i=1;i<=M;i++)
	{
		scanf("%d %d",&x,&y);
		adj[x].push_back(y);
		adj[y].push_back(x);
		present[x]=1;
		present[y]=1;
	}
	int cnt=0;
	
	for(i=1;i<=N;i++)
	{
		if(!visit[i] && present[i])
		{
			dfs(i);
			cnt++;
		}
	}
	printf("%d",cnt);
	return 0;
}