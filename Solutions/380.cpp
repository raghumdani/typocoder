#include <bits/stdc++.h>
using namespace std;

long long int a[100009];

int main() {
	long long int i,j,t1,t2,t3,t4,ans,a1,a2,n;
	scanf("%lld",&n);
	for(i=0;i<n;i++){
	    scanf("%lld",&a[i]);
	}
	a1=t1=0;
	for(i=0;i<n;i++){
	    t1+=a[i];
	    a1+=t1;
	}
	sort(a,a+n);
	a2=t2=0;
	for(i=0;i<n;i++){
	    t2+=a[i];
	    a2+=t2;
	}
	ans=abs(a1-a2);
	printf("%lld\n",ans);
	return 0;
}
