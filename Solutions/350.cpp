#include <bits/stdc++.h>
 
using namespace std;
 
const int N = 205;
const int mod = 1000000007;
int dp[81 * N][N];
 
int main()
{
  int t;
  scanf("%d", &t);
   
  int res[N]; dp[0][0] = 1;
   
  /* add extra 2 * N + 2 for special case */
  for(int i = 0; i < N; ++i) res[i] = 2 * i + 2;
   
  for(int sum = 1; sum <= (N - 1) * 81; ++sum) {
    int cnt[N] = {0};
    for(int i = 1; i < N; ++i) {
      for(int j = 0; j < 10; ++j) {
        if(sum - j * j >= 0) {
          dp[sum][i] = (dp[sum][i] + 0LL + dp[sum - j * j][i - 1]) % mod;
        } else break;
      }
      if(sum <= i * 81) {
        cnt[i] = (cnt[i - 1] + 0LL + dp[sum][i]) % mod;
      }
    }
    for(int i = 1; i < N; ++i) {
      if(sum <= i * 81) {
        res[i] = (res[i] + 0LL + cnt[i] * 1LL * cnt[i]) % mod;
      }
    }
  }
   
  while(t--) {
    int n;
    scanf("%d", &n);
    printf("%d\n", res[n]);
  }
  return(0);
}