#include <bits/stdc++.h>

using namespace std;

const int N = 1000006;
const int mod = 1000000007;
int n;
int t[2 * N];

inline int mul(int a, int b) {
  return (a * (long long) b) % mod;
}

//segment tree part
void build() {
  for (int i = n - 1; i > 0; --i) {
    t[i] = mul(t[2 * i], t[2 * i + 1]);
  }
}

void modify(int pos, int val) {
  for (t[pos += n] = val; pos > 1; pos /= 2) {
    t[pos / 2] = mul(t[pos], t[pos ^ 1]);
  }
}

int query(int l, int r) {
  int res = 1;
  for (l += n, r += n; l < r; l /= 2, r /= 2) {
    if (l % 2) res = mul(res, t[l++]);
    if (r % 2) res = mul(res, t[--r]);
  }
  return res;
}

vector <pair<int, int>> Q[N];
map <int, int> mp;
int ans[N];

int main()
{
  scanf("%d", &n);
  assert(1 <= n && n <= 1000000);
  for (int i = 0; i < n; ++i) {
    scanf("%d", t + n + i);
    assert(1 <= t[n + i] && t[n + i] <= 1000000);
  }

  build();

  int q;
  scanf("%d", &q);
  assert(1 <= q && q <= 1000000);

  for (int i = 0; i < q; ++i) {
    int l, r;
    scanf("%d %d", &l, &r);
    assert(1 <= l && l <= r && r <= n);
    Q[r - 1].push_back({l - 1, i});
  }

  // mp[element] is the last index, that element
  // occurred. And processing offline.
  for (int r = 0; r < n; ++r) {
    if (mp.count(t[n + r])) {
      modify(mp[t[n + r]], 1);
    }
    mp[t[n + r]] = r;
    for (pair<int, int> ll : Q[r]) {
      ans[ll.second] = query(ll.first, r + 1);
    }
  }

  for (int i = 0; i < q; ++i) {
    printf("%d\n", ans[i]);
  }
  return(0);
}
