#include <bits/stdc++.h>
using namespace std;

int main() {
	long long int t,i,j,n,ans,t1;
	scanf("%lld",&t);
	while(t--){
	    scanf("%lld",&n);
	    ans=1;
	    if(n==0)
	        ans=0;
	    while(n>0){
	        t1=n%10;
	        ans*=t1;
	        n/=10;
	    }
	    printf("%lld\n",ans);
	}
	return 0;
}
