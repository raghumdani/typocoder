#include <bits/stdc++.h>

using namespace std;

const int N = 1000005;
int a[N];

int main()
{
  int t;
  scanf("%d", &t);
  while(t--) {
    int n;
    scanf("%d", &n);
    memset(a, 0, sizeof(a));
    for(int i = 0; i < n; ++i) {
      int foo; scanf("%d", &foo);
      a[foo]++;
    }
    for(int i = N - 1; i >= 1; --i) {
      int cnt = 0;
      for(int j = i; j < N; j += i) {
        cnt += a[j];
      }
      if(cnt >= 2) {
        printf("%d\n", i);
        break;
      }
    }
  }
  return(0);
}
