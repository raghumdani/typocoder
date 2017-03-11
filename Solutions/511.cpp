#include <bits/stdc++.h>

using namespace std;

int main()
{
  int t;
  scanf("%d", &t);

  while (t--) {
    int n;
    scanf("%d", &n);

    if (n == 0) {
      printf("0\n");
      continue;
    }
    long long res = 1;
    while (n > 0) {
      res *= n % 10;
      n /= 10;
    }

    printf("%lld\n", res);
  }
  return(0);
}
