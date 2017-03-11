#include <bits/stdc++.h>

using namespace std;

const int N = 1000006;
int prim[N], sum[N];

int main()
{
  for(int i = 2; i < N; ++i) prim[i] = 1;
  for(int i = 2; i < N; ++i) {
    if(prim[i]) {
      for(long long j = i *1LL* i; j < N; j += i) {
        prim[j] = 0;
      }
    }
    sum[i] = sum[i] + prim[i];
  }
  int q;
  scanf("%d", &q);
  while(q--) {
    int n;
    scanf("%d", &n);
    printf("%d\n", sum[n]);
  }
  return(0);
}
