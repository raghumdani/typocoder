#include <bits/stdc++.h>

using namespace std;

const int N = 2005;

int dp[N][2], a[N], ans[N];

int f(int i, int p) {
  if (dp[i][p] != -1) return dp[i][p];

  int& res = (dp[i][p] = 1);

  for (int j = i - 1; j >= 0; --j) {
    if ((a[j] < a[i]) == p) {
      res = max(res, 1 + f(j, p ^ 1));
    }
  }

  return res;
}

void g(int i, int p, int id) {
  assert(id > 0);
  ans[id - 1] = a[i];
  int then = -1;
  for (int j = i - 1; j >= 0; --j) {
    if ((a[j] < a[i]) == p) {
      if (f(i, p) == 1 + f(j, p ^ 1)) {
        then = j;
      }
    }
  }
  if (then != -1) g(then, p ^ 1, id - 1);
}

set <int> S;

int main()
{
  int t;
  scanf("%d", &t);

  assert(1 <= t && t <= 10);

  while (t--) {
    S.clear();
    int n;
    scanf("%d", &n);
    assert(1 <= n && n <= 2000);

    for (int i = 0; i < n; ++i) {
      scanf("%d", a + i);
      assert(!S.count(a[i]));
      S.insert(a[i]);
      assert(-1000000000LL <= a[i] && a[i] <= 1000000000LL);
    }

    memset(dp, -1, sizeof(dp));

    int mx = 0;
    for (int i = 0; i < n; ++i) {
      mx = max(mx, max(f(i, 0), f(i, 1)));
    }

    for (int i = 0; i < n; ++i) {
      if (f(i, 0) == mx) {
        g(i, 0, mx);
        break;
      }
      if (f(i, 1) == mx) {
        g(i, 1, mx);
        break;
      }
    }

    printf("%d\n", mx);

    int last = -1;
    for (int i = 0; i < mx; ++i) {
      printf("%d ", ans[i]);
      if (i > 0) {
        if (last == -1) last = (ans[i - 1] < ans[i]);
        else assert(last == (ans[i - 1] < ans[i]));
        last ^= 1;
      }
    }
    printf("\n");
  }

  return(0);
}
