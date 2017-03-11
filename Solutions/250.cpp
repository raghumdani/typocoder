#include <bits/stdc++.h>

using namespace std;

const int N = 5000;
char s[N];
int cnt[26];

int main()
{
  int n = 0, odd = 0;
  for(int i = 0; i < 26; ++i) {
    scanf("%d", cnt + i);
    n += cnt[i];
    odd += (cnt[i] % 2);
  }
  if(odd > 1) {
    printf("-1\n");
    return 0;
  }
  int i = 0, j = n - 1;
  s[n] = '\0';
  for(int c = 0; c < 26; ++c) {
    while(cnt[c] >= 2) {
      s[i] = s[j] = (char)(c + 'a');
      cnt[c] -= 2; i++; --j;
    }
  } 
  for(int c = 0; c < 26; ++c) {
    if(cnt[c]) s[i] = (char) (c + 'a'), i++;
  }
  printf("%s\n", s);
  return(0);
}
