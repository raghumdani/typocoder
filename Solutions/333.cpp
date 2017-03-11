#include <bits/stdc++.h>

using namespace std;

const int N = 2005;
const int INF = 1000000005;

map <int, vector<int>> g;
map <int, int> cnt, dp;
// cnt is count of each element and dp is
// for finding longest path in a DAG

void dfs(int u) {
  dp[u] = cnt[u];
  for (int v : g[u]) {
    if (!dp.count(v)) dfs(v);
    dp[u] = max(dp[u], dp[v] + cnt[u]);
  }
}

int main()
{
  int t;
  scanf("%d", &t);
  assert(1 <= t && t <= 10);

  while (t--) {
    cnt.clear();
    dp.clear();
    g.clear();

    int n;
    scanf("%d", &n);
    assert(1 <= n && n <= 2000);

    // form a DAG using the nodes
    for (int i = 0; i < n; ++i) {
      int x; scanf("%d", &x);
      assert(0 <= x && x <= 1000000000LL);
      cnt[x]++;
    }

    for (auto from : cnt) {
      for (auto to : cnt) {
        int u = from.first, v = to.first;
        if (u == v) continue;
        if ((u & v) == v) g[u].push_back(v);
      }
    }

    int res = 0;

    // find the longest weighted path in DAG using dp
    for (auto from : cnt) {
      int u = from.first;
      if (!dp.count(u)) {
        dfs(u);
      }
      res = max(res, dp[u]);
    }

    // bam you are with the answer. test it
    printf("%d\n", res);
  }
  return(0);
}
