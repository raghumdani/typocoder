#include <bits/stdc++.h>

using namespace std;

const int N = 100005;

int ans[N], p[N], tr[4 * N], rev[N];

int query(int x, int b, int e, int l, int r) {
  if(l > r) return 0;
  if(b > r || e < l) return 0;
  if(b >= l && e <= r) {
    return tr[x];
  }
  int mid = (b + e) / 2;
  return query(x + x, b, mid, l, r) + query(x + x + 1, mid + 1, e, l, r);
}

void update(int x, int b, int e, int pos) {
  if(b == e) {
    tr[x]++;
  } else {
    int mid = (b + e) / 2;
    if(pos <= mid) update(x + x, b, mid, pos);
    else update(x + x + 1, mid + 1, e, pos);
    tr[x] = tr[x + x] + tr[x + x + 1];
  }
}

int main()
{
  int n;
  scanf("%d", &n);
  for(int i = 1; i <= n; ++i) {
    scanf("%d", &p[i]);
    rev[p[i]] = i;
  }
  for(int i = 1; i <= n; ++i) {
    int ff;
    scanf("%d", &ff);
    int now = rev[ff];
    ans[ff] = query(1, 1, n, now, n);
    update(1, 1, n, now);
  }
  for(int i = 1; i <= n; ++i) {
    printf("%d%c", ans[i], (i == n)?'\n':' ');
  }
  return(0);
}
