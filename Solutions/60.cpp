#include <bits/stdc++.h>

using namespace std;

const int N = 2005;
char a[N], b[N];

int main()
{
  int t;
  scanf("%d", &t);
  while(t--) {
    scanf("%s %s", a, b);
    int n = strlen(a);
    
    int res = 0;
    for(int i = 0; i < n; ++i) {
      res += abs(a[i] - b[i]);
    }
    printf("%d\n", res);
  }
  return(0);
}
