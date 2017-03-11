#include <bits/stdc++.h>

using namespace std;

const int N = 100005;
vector <pair<int, int> > g[N + 1];

long long dp[N][2][2];

void dfs(int u, int p) {
  long long sum = 0;
  for(pair<int,int> it : g[u]) if(it.first != p) {
    int v = it.first, c = it.second;
    dfs(v, u);
    for(int i = 0; i < 2; ++i) {
      dp[u][0][1] += dp[u][i ^ c][0] * dp[v][i][0];
      dp[u][1][1] += dp[u][i ^ 1 ^ c][0] * dp[v][i][0];
    }
    dp[u][1][0] += dp[v][c ^ 1][0];
    dp[u][0][0] += dp[v][c ^ 0][0];
  }
  dp[u][0][0]++;
}

int main()
{
  int t; // t = 100
  scanf("%d", &t);
  while(t--) {
    int n; scanf("%d", &n);
    assert(1 <= n && n <= N);
    memset(dp, 0, sizeof(dp));
    for(int i = 0; i <= n; ++i) g[i].clear();
    for(int i = 0; i < n - 1; ++i) {
      int a, b, c; scanf("%d %d %d", &a, &b, &c);
      g[a].push_back({b, c % 2}); g[b].push_back({a, c % 2});
    }
    dfs(1, 0);
    long long res = 0;
    for(int i = 1; i <= n; ++i) {
      res += dp[i][1][0] + dp[i][1][1];
    }
    printf("%lld\n", res);
  }
  return(0);
}
