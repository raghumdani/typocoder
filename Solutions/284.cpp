#include <bits/stdc++.h>
#define F first
#define mod 1000000007
#define S second 
using namespace std;

long long int dp[600][101];

long long int solve(int n, int k, int K){

	if(dp[n][k] != -1){
		return dp[n][k];
	}
	if(n==0 && k==0){
		return dp[n][k] = 1;
	}
	if(n<k){
		return dp[n][k] = 0;
	}
	if(k==0){
		return dp[n][k] = ((K%mod)*(solve(n-1, 0, K)%mod))%mod;

	}

	return dp[n][k] = (((k%mod)*(solve(n-1, k-1, K)%mod))%mod + (((K-k)%mod)*(solve(n-1, k, K)%mod))%mod)%mod;
}

int main()
{
	int t;
	long long int n,k;
	cin>>t;
	while(t--){
		cin>>n>>k;
		for(int i=0;i<600;i++){
			for(int j=0;j<101;j++){
				dp[i][j] = -1;
			}
		}
		long long int level = ceil(log2(n+1));
		if(k>level){
			cout<<0<<endl;
			continue;
		}

		cout<<((k%mod)*(solve(level-1,k-1, k)%mod))%mod<<endl;
	}
	return 0;
}





