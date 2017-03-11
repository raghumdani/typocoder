#include <bits/stdc++.h>

using namespace std;

const int N = 100005;

typedef long long L;

const long long INF = 10000000000000LL;

L v[N], t[N];
int n;

bool check(L mid, L m) {
  L got = 0;

  for (int i = 0; i < n; ++i) {
    got += (mid / t[i]) * v[i];
    if (got >= m) return 1;
  }

  // we have more mangoes than m
  // after waiting for time 'mid'
  return got >= m;
}

int main()
{
  scanf("%d", &n);
  assert(1 <= n && n <= 100000);

  for (int i = 0; i < n; ++i) {
    scanf("%lld", v + i);
    assert(1 <= v[i] && v[i] <= 1000);
  }

  for (int i = 0; i < n; ++i) {
    scanf("%lld", t + i);
    assert(1 <= t[i] && t[i] <= 1000);
  }

  int q;
  scanf("%d", &q);
  assert(1 <= q && q <= 5);

  while (q--) {
    L lo = -1, hi = INF;
    L m;
    scanf("%lld", &m);
    assert(1 <= m && m <= 10000000000LL);

    while (hi - lo > 1) {
      L mid = (lo + hi) >> 1;
      if (check(mid, m)) {
        hi = mid;
      } else {
        lo = mid;
      }
    }

    printf("%lld\n", hi);
  }
  return(0);
}
