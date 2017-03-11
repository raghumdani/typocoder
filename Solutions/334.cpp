#include <bits/stdc++.h>

using namespace std;

const int N = 200;
const int mod = 1000000007;

inline int mul(int a, int b) {
  return (a * (long long) b) % mod;
}

inline int add(int a, int b) {
  int res = a + b;
  if (res >= mod) res -= mod;
  return res;
}

int n, k;
int dp[N][N], cr[N][N];

// dp calculating ncr value
int nCr(int nn, int rr) {
  if (cr[nn][rr] != -1) return cr[nn][rr];
  int& res = (cr[nn][rr] = 0);
  if (nn < rr) return res;
  if (rr == 0) {
    return res = 1;
  }
  if (rr == 1) {
    return res = nn;
  }
  return res = add(nCr(nn - 1, rr - 1), nCr(nn - 1, rr));
}

// assigns naively nodes to each color
int f(int color, int sum) {
  if (dp[color][sum] != -1) return dp[color][sum];
  int& res = (dp[color][sum] = 0);
  if (color == k) {
    if (sum == n) {
      return res = 1;
    } else {
      return res = 0;
    }
  }
  for (int nodes = 1; nodes <= n - sum; ++nodes) {
    res = add(res, mul(nCr(n - sum, nodes), f(color + 1, sum + nodes)));
  }

  return res;
}

int main()
{
  int t;
  scanf("%d", &t);
  assert(1 <= t && t <= 100);

  // this calculates nCr value
  memset(cr, -1, sizeof(cr));

  while (t--) {
    long long num;
    scanf("%lld %d", &num, &k);
    assert(1 <= num && num <= 1000000000000000000LL);
    assert(1 <= k && k <= 100);
    n = floor(log2(num * 1.0)) + 1;
    memset(dp, -1, sizeof(dp));
    //naively select each color and color nodes with that color
    printf("%d\n", f(0, 0));
  }
  return(0);
}
