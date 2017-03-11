#include <bits/stdc++.h>

using namespace std;

int power(int a, int b, int md) {
  int res = 1;
  while(b > 0) {
    if(b & 1) res = (res * 1LL * a) % md;
    a = (a * 1LL * a) % md;
    b /= 2;
  }
  return res;
}

int tot(int n) {
  int res = n;
  for(int i = 2; i *1LL* i <= n; ++i) {
    if(n % i == 0) {
      res -= res/i;
      while(n % i == 0) n /= i;
    }
  }
  if(n > 1) res -= res/n;
  return res;
}

int main()
{
  int t;
  scanf("%d", &t);
  while(t--) {
    int a, b, c, md;
    scanf("%d %d %d %d", &a, &b, &c, &md);
    if(md == 1) {
      printf("0\n");
      continue;
    }
    if(md == 2) {
      printf("%d\n", a % md);
      continue;
    }
    assert(__gcd(a, md) == 1);
    printf("%d\n", (power(a, power(b, c, tot(md)), md)) % md);
  }
  return(0);
}
