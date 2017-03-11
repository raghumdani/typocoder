#include <bits/stdc++.h>

using namespace std;

int main()
{
  int t;
  cin >> t;
  
  while (t--) {
    char a[2001], b[2001];
    cin >> a >> b;
    int sum = 0, l = strlen(a);
    for (int i = 0; i < l; ++i) {
      sum += abs((int)a[i] - (int)b[i]);
    }
    cout << sum << endl;
  }
  return(0);
}