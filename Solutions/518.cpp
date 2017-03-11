#include <bits/stdc++.h>

using namespace std;

char s[20];

int main()
{
  int t;
  scanf("%d", &t);

  assert(1 <= t && t <= 10);
  while (t--) {
    map <long long, int> cnt;
    scanf("%s", s);
    int n = strlen(s);
    assert(1 <= n && n <= 10);
    long long aa = atoll(s);
    assert(0 <= aa && aa <= 1000000000);

    sort(s, s + n);

    do {
      long long val = 0;
      for (int i = 0; i < n; ++i) {
        val += (i + 1) *1LL* (s[i] - '0');
      }
      cnt[val]++;
      //cout << s << endl;
    } while(next_permutation(s, s + n));

    int mx = 0;
    for (auto it : cnt) {
      mx = max(mx, it.second);
    }

    printf("%d\n", mx);
  }
  return(0);
}
