#include <bits/stdc++.h>

using namespace std;

const int N = 100005;
int used[N];
vector <int> g[N];

void dfs(int u) {
  used[u] = 1;
  for (int v : g[u]) if (!used[v]) dfs(v);
}

int main()
{
  int n, m;
  scanf("%d %d", &n, &m);

  for (int i = 0; i < m; ++i) {
    int u, v;
    scanf("%d %d", &u, &v);
    g[u].push_back(v);
    g[v].push_back(u);
  }

  int res = 0;
  for (int i = 1; i <= n; ++i) {
    if (!used[i]) dfs(i), res++;
  }

  printf("%d\n", res);

  return(0);
}
