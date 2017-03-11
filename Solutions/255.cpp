#include <bits/stdc++.h>

using namespace std;

const int N = 100005;
const int lg = 25;

vector <pair<int,int> > g[N];
int par[N][lg], h[N];
long long xo[N];

void dfs(int u, int p) {
  for(pair<int,int> to : g[u]) if(to.first != p) {
    int v = to.first, c = to.second;
    par[v][0] = u;
    h[v] = h[u] + 1;
    xo[v] = xo[u] + (h[u] % 2?-c:c);
    dfs(v, u);
  }
}

int main()
{
  int n;
  scanf("%d", &n);
  for(int i = 0; i < n - 1; ++i) {
    int u, v, c;
    scanf("%d %d %d", &u, &v, &c);
    g[u].push_back({v, c});
    g[v].push_back({u, c});
  }
  int q;
  scanf("%d", &q);
  dfs(1, 0);
  for(int i = 1; i < lg; ++i) {
    for(int j = 1; j <= n; ++j) {
      par[j][i] = par[ par[j][i - 1] ][i - 1]; 
    }
  }

  while(q--) {
    int u, v;
    scanf("%d %d", &u, &v);
    int a = u, b = v;
    
    while(a != b) {
      if(h[a] < h[b]) swap(a, b);
      if(h[a] == h[b]) {
        a = par[a][0];
        b = par[b][0];
        continue;
      }
      int mxid = 0;
      for(int i = 0; i < lg; ++i) {
        if((h[a] - h[b]) & (1 << i)) mxid = i;
      }
      a = par[a][mxid];
    }
    int lca = a;
    long long res = 0, left = xo[u] - xo[lca], right = xo[v] - xo[lca];
    int hl = h[u] - h[lca], rl = h[v] - h[lca];
    if(h[u] % 2 == 0) left =- left;
    if(h[lca] % 2 == 1) right =- right;
    if(hl % 2 == 0) {
      res = left + right;
    } else {
      res = left - right;
    }
    printf("%lld\n", res);
  }
  return(0);
}
