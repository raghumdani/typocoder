#include <bits/stdc++.h>

using namespace std;

const int N = 100005;
int cnt[N];

int main()
{
  //freopen("IN.txt", "r", stdin);
  //freopen("out.txt", "w", stdout);
  int t;
  scanf("%d", &t);
  
  while(t--) {
    int n, k;
    scanf("%d %d", &n, &k);
    
    memset(cnt, 0, sizeof(cnt));
    int res = 1;
    for(int i = 0; i < n; ++i) {
      int foo; scanf("%d", &foo);
      cnt[foo]++;
      res = max(res, cnt[foo]);
    }
    for(int i = 0; i < N; ++i) {
      if(k != 0 && i - 2 * k >= 0) {
        cnt[i] += cnt[i - 2 * k];
      }
      res = max(res, cnt[i]);
    }
    printf("%d\n", res);
  }
  return(0);
}
