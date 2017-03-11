#include "bits/stdc++.h"
using namespace std;

int n, m;
vector < int > adj[100005];
int vis[100005];

void dfs(int x)
{
    vis[x] = 1;
    for(auto it : adj[x])
    {
        if(!vis[it])
            dfs(it);
    }
}

int main()
{
    scanf("%d %d", &n, &m);
    while( m-- )
    {
        int x, y;
        scanf("%d %d", &x, &y);
        adj[x].push_back(y);
        adj[y].push_back(x);
    }
    int meghans = 0;
    for(int i = 1 ; i <= n ; i++)
    {
        if(!vis[i])
        {
            dfs(i);
            meghans++;
        }
    }
    printf("%d\n", meghans);
    return 0;
}
