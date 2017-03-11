#include<bits/stdc++.h>
using namespace std;

int main()
{
	int T;
	scanf("%d",&T);

	while(T--)
	{
		long long int n;
		scanf("%lld",&n);
		
		if(n < 4)
			printf("Alice\n");
		else if(n<8)
			printf("Bob\n");
		else
		{
			int temp = (int)log2(n);
			temp=(temp+1)/2;
			
			if(temp&1)
				printf("Bob\n");
			else
				printf("Alice\n");		
		}			
			
	}
	return 0;
}