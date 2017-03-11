#include <bits/stdc++.h>

using namespace std;

vector <int> v;

int main()
{
  while();
  int n;
  scanf("%d", &n);
  v.resize(n);
  for(int i = 0; i < n; ++i) {
    scanf("%d", &v[i]);
  }
  sort(v.begin(), v.end());
  for(int i = 0; i < n; ++i) {
    printf("%d\n", v[i]);
  }
  return(0);
}
