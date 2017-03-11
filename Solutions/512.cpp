#include <bits/stdc++.h>

using namespace std;

const int N = 100005;
int a[N], b[N];

int main()
{
  int n;
  scanf("%d", &n);

  assert(1 <= n && n <= 100000);

  long long sum = 0, pre = 0;
  for (int i = 0; i < n; ++i) {
    scanf("%d", a + i);
    pre += a[i];
    sum += pre;
    b[i] = a[i];
    assert(1 <= a[i] && a[i] <= 1000);
  }

  sort(b, b + n);
  pre = 0;
  long long res = 0;
  for (int i = 0; i < n; ++i) {
    pre += b[i];
    res += pre;
  }

  printf("%lld\n", sum - res);
  return(0);
}
