#include <bits/stdc++.h>

using namespace std;

const int N = 100005;
int a[N], cnt[N];
set <int> ids;

int main()
{
  int n;
  scanf("%d", &n);

  assert(1 <= n && n <= 100000);

  memset(cnt, -1, sizeof(cnt));

  for (int i = 0; i < n; ++i) {
    scanf("%d", a + i);
    assert(1 <= a[i] && a[i] <= n);
    assert(cnt[a[i]] == -1);
    cnt[a[i]] = i;
  }

  // maximum element will be passed on n times, no matter what
  long long res = n;
  ids.insert(cnt[n]);
  // iterate from the second max element to least
  for (int i = n - 1; i >= 1; --i) {
    // now check from previous indices, the min index which is greater
    // than it or choose the one which is least

    int cur = cnt[i];
    auto it = ids.lower_bound(cur);

    //if its not there, choose the begin index
    if (it == ids.end()) {
      it = ids.begin();
    }

    int stopId = *it; // this is the id where passing is stopped

    res += (stopId - cur + n) % n;
    ids.insert(cur);
  }

  printf("%lld\n", res);
  return(0);
}
