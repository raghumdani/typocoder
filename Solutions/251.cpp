#include <bits/stdc++.h>

using namespace std;

const int N = 5000006;
int tr[N][26], leaf[N];
char s[N];

int main()
{
  int n;
  scanf("%d", &n);
  int m = 1, plus = 0;
  for(int i = 0; i < n; ++i) {
    scanf("%s", s);
    int nn = strlen(s);
    assert(1 <= nn && nn <= 1000000);
    plus += nn;
    int t = 1;
    for(int j = nn - 1; j >= 0; --j) {
      int to = s[j] - 'a';
      if(tr[t][to] == 0) {
        ++m;
        tr[t][to] = m;
      }
      t = tr[t][to];
      leaf[t]++;
    }
    assert(m < N);
  }
  assert(1 <= plus && plus <= 1000000);
  int q, plus2 = 0;
  scanf("%d", &q);
  while(q--) {
    scanf("%s", s);
    int nn = strlen(s);
    assert(1 <= nn && nn <= 1000000);
    plus2 += nn;
    int t = 1;
    for(int i = nn - 1; i >= 0; --i) {
      int to = s[i] - 'a';
      if(tr[t][to] == 0) {
        t = 0;
        break;
      } else {
        t = tr[t][to];
      }
    }
    printf("%d\n", leaf[t]);
  }
  assert(1 <= plus2 && plus2 <= 1000000);
  return(0);
}
