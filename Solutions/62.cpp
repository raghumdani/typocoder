#include <bits/stdc++.h>

using namespace std;

const int N = 55, inf = (int)1e9;
char s[N][N];
int d[N][N], e[N][N];
vector < pair <int,int> > g[N][N];

int main()
{
  int t;
  scanf("%d", &t);
  
  while(t--) {
    int n, m;
    scanf("%d %d", &n, &m);
    memset(e, 0, sizeof(e));
    
    for(int i = 0; i <= n; ++i) {
      for(int j = 0; j <= m; ++j) {
        d[i][j] = inf;
        g[i][j].clear();
      }
    }
    
    for(int i = 0; i < n; ++i) {
      scanf("%s", s[i]);
    }
    queue < pair<int,int> > Q;
    /* Create a graph out of a grid */
    for(int i = 0; i < n; ++i) {
      for(int j = 0; j < m; ++j) {
        if(s[i][j] != '*') {
          for(int dx = -1; dx < 2; ++dx) {
            for(int dy = -1; dy < 2; ++dy) {
              if(i + dx >= 0 && i + dx < n && j + dy >= 0 && j + dy < m && (dx == 0 || dy == 0)) {
                if(s[i + dx][j + dy] != '*') {
                  g[i][j].push_back({i + dx, j + dy});
                }
              }
            }
          }
        }
        if(s[i][j] == 'U') Q.push({i, j}), d[i][j] = 0;
        if(s[i][j] == 'E') e[i][j] = 1;
      }
    }
    int res = inf;
    /* Now run a BFS on a starting point as U */
    while(! Q.empty() ) {
      int x, y;
      x = Q.front().first, y = Q.front().second;
      Q.pop(); /* To learn implementation of queue go to cplusplus.com*/ 
      for(auto to : g[x][y]) {
        if(d[to.first][to.second] > d[x][y] + 1) {
          d[to.first][to.second] = d[x][y] + 1;
          Q.push({to.first, to.second});
        }
      }
      if(e[x][y]) res = min(res, d[x][y]);
    }
    printf("%d\n", (res == inf)?-1:res);
  }
  return(0);
}
