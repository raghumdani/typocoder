#include <iostream>
using namespace std;

int main() {
	int t;
	long long int a,b,c,m,i,j,t1,t2;
	scanf("%d",&t);
	while(t--)
	{
		scanf("%lld %lld %lld %lld",&a,&b,&c,&m);
		t1=1;
		for(i=0;i<b;i++)
		{
			t1=t1%m;
			a=a%m;
			t1=t1*a;
		}
		t2=1;
		for(i=0;i<c;i++)
		{
			t2=t2%m;
			t1=t1%m;
			t2=t2*t1;
		}
		printf("%lld\n",t2);
	}
	return 0;
}