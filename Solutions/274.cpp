#include<bits/stdc++.h>
int a[1000001],check[1000001];
int m = 1000000007;
int main(){
	int q,n,i,l,r,j;
	scanf("%d",&n);
	for(i=0;i<n;++i){
		scanf("%d",&a[i]);
	}
	scanf("%d",&q);
	long long int ans = 1;
	for(i=0;i<q;++i){
		ans = 1;
		scanf("%d%d",&l,&r);
		l--;
		r--;
		for(j=l;j<=r;++j){
			if(check[a[j]]==0){
				check[a[j]] = 1;
				ans = (ans * a[j])%m;
			}
		}
		for(j=l;j<=r;++j){
			check[a[j]] = 0;
		}
		printf("%lld\n",ans);
	}
}