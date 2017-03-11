#include <bits/stdc++.h>

using namespace std;

int main()
{
  int t;
  scanf("%d", &t);
  while(t--) {
    int n; scanf("%d", &n);
    assert(1 <= n && n <= 100000);
    if(n == 1) {
      printf("NO\n");
      continue;
    }
    bool done = false;
    for(int i = 2; i *1LL* i <= n; ++i) {
      if(n % i == 0) done = true;
    }
    printf("%s\n", done?"NO":"YES");
  }
  return(0);
}
